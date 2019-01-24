<?php
 
/**
 * 状态模式的PHP简单实现 2019-01-23
 */
 
/**
 * 抽象状态角色
 */
interface State {
 
    /**
     * 方法示例
     */
    public function handle(Context $context);
}
 
/**
 * 具体状态角色A
 * 单例类
 */
class ConcreteStateA implements State {
    /* 唯一的实例 */
    private static $_instance = null;
 
    private function __construct() {
 
    }
 
    /**
     * 静态工厂方法，返还此类的唯一实例
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new ConcreteStateA();
        }
 
        return self::$_instance;
    }
 
    public function handle(Context $context) {
        echo 'Concrete Sate A handle method<br />';
        $context->setState(ConcreteStateB::getInstance());
    }
 
}
 
/**
 * 具体状态角色B
 * 单例类
 */
class ConcreteStateB implements State {
    /* 唯一的实例 */
 
    private static $_instance = null;
 
    private function __construct() {
    }
 
    /**
     * 静态工厂方法，返还此类的唯一实例
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new ConcreteStateB();
        }
 
        return self::$_instance;
    }
 
    public function handle(Context $context) {
        echo 'Concrete Sate B handle method<br />';
        $context->setState(ConcreteStateA::getInstance());
    }
 
}
 
/**
 * 环境角色
 */
class Context {
 
    private $_state;
 
    /**
     * 默认为StateA
     */
    public function __construct() {
        $this->_state = ConcreteStateA::getInstance();
    }
 
    public function setState(State $state) {
        $this->_state = $state;
    }
 
    public function request() {
        $this->_state->handle($this);
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
        $context = new Context();
        $context->request();
        $context->request();
        $context->request();
        $context->request();
    }
 
}
 
Client::main();
?>