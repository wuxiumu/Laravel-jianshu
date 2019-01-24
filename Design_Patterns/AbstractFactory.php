<?php
/**
 * 抽象工厂模式 2019-01-23
 */
 
/**
 * 抽象工厂
 */
interface AbstractFactory {
    /**
     * 创建等级结构为A的产品的工厂方法
     */
    public function createProductA();
 
    /**
     * 创建等级结构为B的产品的工厂方法
     */
    public function createProductB();
 
}
 
/**
 * 具体工厂1
 */
class ConcreteFactory1 implements AbstractFactory{
 
    public function createProductA() {
        return new ProductA1();
    }
 
    public function createProductB() {
        return new ProductB1();
    }
}
 
 
/**
 * 具体工厂2
 */
class ConcreteFactory2 implements AbstractFactory{
 
    public function createProductA() {
        return new ProductA2();
    }
 
    public function createProductB() {
        return new ProductB2();
    }
}
 
/**
 * 抽象产品A
 */
interface AbstractProductA {
 
    /**
     * 取得产品名
     */
    public function getName();
}
 
/**
 * 抽象产品B
 */
interface AbstractProductB {
 
    /**
     * 取得产品名
     */
    public function getName();
}
 
/**
 * 具体产品Ａ1
 */
class ProductA1 implements AbstractProductA {
    private $_name;
 
    public function __construct() {
        $this->_name = 'product A1';
    }
 
    public function getName() {
        return $this->_name;
    }
}
 
 
/**
 * 具体产品Ａ2
 */
class ProductA2 implements AbstractProductA {
    private $_name;
 
    public function __construct() {
        $this->_name = 'product A2';
    }
 
    public function getName() {
        return $this->_name;
    }
}
 
 
/**
 * 具体产品B1
 */
class ProductB1 implements AbstractProductB {
    private $_name;
 
    public function __construct() {
        $this->_name = 'product B1';
    }
 
    public function getName() {
        return $this->_name;
    }
}
 
/**
 * 具体产品B2
 */
class ProductB2 implements AbstractProductB {
    private $_name;
 
    public function __construct() {
        $this->_name = 'product B2';
    }
 
    public function getName() {
        return $this->_name;
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
        self::run(new ConcreteFactory1());
        self::run(new ConcreteFactory2());
    }
 
    /**
     * 调用工厂实例生成产品，输出产品名
     * @param   $factory    AbstractFactory     工厂实例
     */
    public static function run(AbstractFactory $factory) {
        $productA = $factory->createProductA();
        $productB = $factory->createProductB();
        echo $productA->getName(), '<br />';
        echo $productB->getName(), '<br />';
    }
 
}
 
Client::main();
?>