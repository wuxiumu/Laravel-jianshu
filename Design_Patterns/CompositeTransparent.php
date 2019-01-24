<?php
/**
 * 透明的合成模式的PHP实现 2019-01-23
 */
 
/**
 * 抽象组件角色
 */
interface Component {
 
    /**
     * 返回自己的实例
     */
    public function getComposite();
 
    /**
     * 示例方法
     */
    public function operation();
 
      /**
     * 聚集管理方法 添加一个子对象
     * @param Component $component  子对象
     */
    public function add(Component $component);
 
    /**
     * 聚集管理方法 删除一个子对象
     * @param Component $component  子对象
     * @return boolean  删除是否成功
     */
    public function remove(Component $component);
 
    /**
     * 聚集管理方法 返回所有的子对象
     */
    public function getChild();
 
}
 
/**
 * 树枝组件角色
 */
class Composite implements Component {
    private $_composites;
 
    public function __construct() {
        $this->_composites = array();
    }
 
    public function getComposite() {
        return $this;
    }
 
    /**
     * 示例方法，调用各个子对象的operation方法
     */
    public function operation() {
        echo 'Composite operation begin:<br />';
        foreach ($this->_composites as $composite) {
            $composite->operation();
        }
        echo 'Composite operation end:<br /><br />';
    }
 
    /**
     * 聚集管理方法 添加一个子对象
     * @param Component $component  子对象
     */
    public function add(Component $component) {
        $this->_composites[] = $component;
    }
 
    /**
     * 聚集管理方法 删除一个子对象
     * @param Component $component  子对象
     * @return boolean  删除是否成功
     */
    public function remove(Component $component) {
        foreach ($this->_composites as $key => $row) {
            if ($component == $row) {
                unset($this->_composites[$key]);
                return TRUE;
            }
        }
 
        return FALSE;
    }
 
    /**
     * 聚集管理方法 返回所有的子对象
     */
    public function getChild() {
       return $this->_composites;
    }
 
}
 
class Leaf implements Component {
    private $_name;
 
    public function __construct($name) {
        $this->_name = $name;
    }
 
    public function operation() {
        echo 'Leaf operation ', $this->_name, '<br />';
    }
 
    public function getComposite() {
        return null;
    }
 
      /**
     * 聚集管理方法 添加一个子对象,此处没有具体实现，仅返回一个FALSE
     * @param Component $component  子对象
     */
    public function add(Component $component) {
        return FALSE;
    }
 
    /**
     * 聚集管理方法 删除一个子对象
     * @param Component $component  子对象
     * @return boolean  此处没有具体实现，仅返回一个FALSE
     */
    public function remove(Component $component) {
        return FALSE;
    }
 
    /**
     * 聚集管理方法 返回所有的子对象 此处没有具体实现，返回null
     */
    public function getChild() {
       return null;
    }
 
}
 
 
/**
 * 客户端
 */
class Client {
 
    /**
     * Main program.
     */
    public static function main() {
        $leaf1 = new Leaf('first');
        $leaf2 = new Leaf('second');
 
        $composite = new Composite();
        $composite->add($leaf1);
        $composite->add($leaf2);
        $composite->operation();
 
        $composite->remove($leaf2);
        $composite->operation();
 
    }
 
}
 
Client::main();
?>