<?php 
header("content-type:text/html;charset=utf-8");

//数据库模型类
class Model
{
    private $link = null;//连接标识
    private $tabName = null;//用于存储表名
    private $field = array();//字段列表
    private $pk;//主键的名字
    private $keys;//要查询的字段
    private $where;//查询条件
    private $order;//排序条件
    private $limit;//分页条件

    //初始化数据库连接
    public function __construct($tabName)
    {
        $this->link = mysqli_connect(HOST,USER,PWD,DB);
        mysqli_set_charset($this->link, CHAR);
        $this->tabName = $tabName;
        $this->getField();
    }

    //查全部
    public function select()
    {
        $keys = "*";//默认查全部
        if (!empty($this->keys)) {
            $keys = $this->keys;
            $this->keys = null;
        }
        //判断有无WHERE条件
        $where = '';
        if (!empty($this->where)) {
            $where = "WHERE ".$this->where;
            $this->where = null;
        }
        //判断有误order条件
        $order = '';
        if (!empty($this->order)) {
            $order = "ORDER BY ".$this->order;
            $this->order = null;
        }
        //判断有无limit条件
        $limit = '';
        if (!empty($this->limit)) {
            $limit = "LIMIT ".$this->limit;
            $this->limit = null;
        }

        //SQL
        $sql = "SELECT {$keys} FROM {$this->tabName} {$where} {$order} {$limit}";
        return $this->query($sql);
    }

    //查单条数据
    public function find($findValue, $findKey = 'id')
    {
        $keys = "*";//默认查全部
        if (!empty($this->keys)) {
            $keys = $this->keys;
            $this->keys = null;
        }
        $sql = "SELECT {$keys} FROM {$this->tabName} WHERE {$findKey}='{$findValue}' LIMIT 1";
        $data = $this->query($sql);
        return $data[0];
    }
    //获取要查询的指定字段
    public function field($arr)
    {
        //判断参数是否是数组
        if (!is_array($arr)) return $this;
        //检查字段是否合法
        foreach ($arr as $key => $val) {
            if (!in_array($val, $this->field)) {
                unset($arr[$key]);
            }
        }
        //参数是否为空
        if (empty($arr)) return $this;
        //生成查询字段
        $this->keys = implode(',', $arr);

        return $this;
    }
    //指定where条件
    public function where($where)
    {
        //设置where条件
        $this->where = $where;
        return $this;
    }
    //排序
    public function order($order)
    {
        //设置排序条件
        $this->order = $order;
        return $this;
    }
    //分页
    public function limit($limit)
    {
        //设置分页条件
        $this->limit = $limit;
        return $this;
    }
    //删除数据
    public function del($delValue, $delKey = 'id')
    {
        $sql = "DELETE FROM {$this->tabName} WHERE {$delKey}='{$delValue}'";
        return $this->execute($sql);
    }

    //增
    public function add($data = array())
    {
        //直接给参数POST不合适
        //判断$data是否为空,为空就是赋值POST
        if (empty($data)) {
            $data = $_POST;
        }
        //进行数据筛选
        foreach ($data as $k => $v) {
            //判断 如果POST里的$k 在字段列表之中
            if (in_array($k, $this->field)) {
                $list[$k] = $v;
            }
        }
        // echo '<pre>';
        //     print_r($list);
        // echo '</pre>';
        //生成SQL中的$key和values的值
        $keys = implode(',',array_keys($list));
        $values = implode("','",array_values($list));
        //SQL
        $sql = "INSERT INTO {$this->tabName} ($keys) VALUES('$values')";
        //执行添加操作
        return $this->execute($sql);
    }

    //改
    public function update($data = array())
    {
        //$data为空 就把POST赋值给他
        if (empty($data)) {
            $data = $_POST;
        }
        //筛选POST数据
        foreach ($data as $k => $v) {
            if (in_array($k, $this->field)) {
                $list[] = "`{$k}`='{$v}'";
            }
        }
        //生成SET条件
        $set = implode(',', $list);
        //SQL
        $sql = "UPDATE {$this->tabName} SET {$set} WHERE `{$this->pk}`='{$data[$this->pk]}'";
        //执行操作
        return $this->execute($sql);
    }

    //统计条目数量
    public function count()
    {
        //判断有无WHERE条件
        $where = '';
        if (!empty($this->where)) {
            $where = "WHERE ".$this->where;
            $this->where = null;
        }
        $sql = "SELECT COUNT(*) total FROM {$this->tabName} {$where}";
        $total = $this->query($sql);
        return $total[0]['total'];
    }

    /********************辅助方法****************************/
    //获取数据表内的所有字段 及主键
    public function getField()
    {
        //查询表结构
        $sql  = "DESC {$this->tabName}";
        $list = $this->query($sql);
        // echo '<pre>';
        //     print_r($list);
        // echo '</pre>';
        //遍历得到所有字段名字
        $fields = array();
        foreach ($list as $val) {
            $fields[] = $val['Field'];
            if ($val['Key'] == 'PRI') {
                $this->pk = $val['Field'];
            }
        }
        $this->field = $fields;
    }

    //执行查询的方法
    private function query($sql)
    {
        //执行SQL语句
        $result = mysqli_query($this->link, $sql);
        //判断执行结果
        if ($result && mysqli_num_rows($result) > 0) {
            $list = array();
            $list = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            //返回查询的结果数组
            return $list;
        } else {
            //查询失败,返回false
            return false;
        }
    }

    //执行增删改,返回执行结果或自增ID
    private function execute($sql)
    {
        //执行SQL语句
        $result = mysqli_query($this->link, $sql);
        //处理结果集
        if ($result && mysqli_affected_rows($this->link) > 0) {
            //添加时回返回自增ID
            if (mysqli_insert_id($this->link) > 0) {
                //添加操作
                return mysqli_insert_id($this->link);
            } else {
                //删改成功 返回true
                return true;
            }
            
        } else {
            //操作失败 返回false
            return false;
        }
        
    }

    //销毁资源
    public function __destruct()
    {
        mysqli_close($this->link);
    }
}



