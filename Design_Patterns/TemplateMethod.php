<?php
/**
 * 模板方法模式简单示例 2019-01-23
 */
 
/**
 * 抽象模板角色
 * 定义抽象方法作为顶层逻辑的组成部分，由子类实现
 * 定义模板方法作为顶层逻辑的架子，调用基本方法组装顶层逻辑
 */
abstract class AbstractClass {
 
    /**
     * 模板方法 调用基本方法组装顶层逻辑
     */
    public function templateMethod() {
        echo 'templateMethod begin.<br />';
        $this->primitiveOperation1();
        $this->primitiveOperation2();
        echo 'templateMethod end.<br />';
    }
 
    /**
     * 基本方法1
     */
    abstract protected function primitiveOperation1();
 
     /**
     * 基本方法2
     */
    abstract protected function primitiveOperation2();
}
 
/**
 * 具体模板角色
 * 实现父类的抽象方法
 */
class ConcreteClass extends AbstractClass{
    /**
     * 基本方法1
     */
    protected function primitiveOperation1() {
        echo 'primitiveOperation1<br />';
    }
 
     /**
     * 基本方法2
     */
    protected function primitiveOperation2(){
        echo 'primitiveOperation2<br />';
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
        $class = new ConcreteClass();
        $class->templateMethod();
    }
}
 
Client::main();
?>