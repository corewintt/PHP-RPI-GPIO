<?php


final class GPIO
{
    # usleep 1000000 1second

    const USECOND = 1000000;
    const MODE_IN = 'in';
    const MODE_OUT = 'out';

    const LOGIC_HIGHT = 1;
    const LOGIC_LOW = 0;

    const GPIO_DIR = '/sys/class/gpio';

    const GPIO_EXPORT = 'export';
    const GPIO_UNEXPORT = 'unexport';

    const GPIO_FILE_PREFIX = 'gpio';
    const GPIO_FILE_MODE = 'direction';
    const GPIO_FILE_VALUE = 'value';


    protected $_pin = NULL;
    protected $_pin_dir = NULL;

    static $_intanse = array();


    /**
     * @param int $gpio
     * @param string $mode
     * @return GPIO
     */
    static function get($gpio, $mode = '')
    {
        if(empty(self::$_intanse[$gpio]))
        {
            self::$_intanse[$gpio] = new self($gpio, $mode);
        }

        return self::$_intanse[$gpio];
    }

    private function __construct($gpio, $mode)
    {
        if(is_numeric($gpio))
        {
            $this->_pin = $gpio;
            $this->_pin_dir = self::GPIO_DIR . DIRECTORY_SEPARATOR . self::GPIO_FILE_PREFIX . $gpio;
            $cmd = 'echo ' . $this->_pin . ' > ' . self::GPIO_DIR . DIRECTORY_SEPARATOR . self::GPIO_EXPORT;
            exec($cmd);
            exec($cmd);
            # usleep 1000 000 1second
            usleep(50000);
        }
        else
        {
            return FALSE;
        }
    }

    public function unexport()
    {
        $cmd = 'echo ' . $this->_pin . ' > ' . self::GPIO_DIR . DIRECTORY_SEPARATOR . self::GPIO_UNEXPORT;
        exec($cmd);
    }


    public function info()
    {
        $mode = trim(file_get_contents($this->_pin_dir . DIRECTORY_SEPARATOR . self::GPIO_FILE_MODE));
        $value = (float)file_get_contents($this->_pin_dir . DIRECTORY_SEPARATOR . self::GPIO_FILE_VALUE);

        return array('mode' => $mode, 'value' => $value);
    }

    public function pulse($signal_width, $signal_pause)
    {
        $this->writeDigital(self::LOGIC_HIGHT);
        usleep($signal_width);
        $this->writeDigital(self::LOGIC_LOW);
        usleep($signal_pause);
    }

    public function signalPWM($Hz,$stretch,$count)
    {
        $duty_cycle = self::USECOND / $Hz;
        if($stretch > 100)
        {
            $stretch =100;
        }
        elseif($stretch < 0)
        {
            $stretch = 0;
        }

        $time_signal = $duty_cycle*$stretch/100;
        $time_pause = $duty_cycle-$time_signal;

        for ($i = 1; $i <= $count; $i++)
        {
            $this->pulse($time_signal,$time_pause);
        }
    }


    public function writeDigital($val)
    {
        if(in_array($val, array(self::LOGIC_HIGHT, self::LOGIC_LOW,)))
        {
            $file = $this->_pin_dir . DIRECTORY_SEPARATOR . self::GPIO_FILE_VALUE;
            $cmd = 'echo ' . $val . ' > ' . $file;
            exec($cmd);
        }
        else
        {
            trigger_error('Нельзя записать не логические даные', E_USER_ERROR);
        }
    }

    public function read()
    {
        $file = $this->_pin_dir . DIRECTORY_SEPARATOR . self::GPIO_FILE_VALUE;
        return floatval(file_get_contents($file));
    }

    public function mode($val)
    {
        if(in_array($val, array(self::MODE_OUT, self::MODE_IN,)))
        {
            $file = $this->_pin_dir . DIRECTORY_SEPARATOR . self::GPIO_FILE_MODE;
            $cmd = 'echo ' . $val . ' > ' . $file;
            exec($cmd);
        }
        else
        {
            trigger_error('Нельзя записать мод', E_USER_ERROR);
        }
    }
}

