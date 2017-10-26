<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 26/10/2017
 * Time: 16:05
 */

namespace ToolForm;


class ToolForm
{
    private $key_token;

    /**
     * Form constructor.
     * @param $key_token
     */
    public function __construct($key_token)
    {
        $this->key_token = $key_token;
    }

    #Methode private

    /**
     *
     */
    private function inputHidden()
    {
        ?>
        <input type="hidden" name="_token" value="<?= $this->key_token ?>"/>
        <?php
    }


    /**
     * @param array $param
     * @return string
     */
    private function parametre($param = [])
    {
        if (count($param) == 0) {

            return " ";

        } else {
            foreach ($param as $key => $value) {
                echo $key . '="' . $value . '" ';
            }

        }

    }

    #methode public

    /**
     * @param string $url
     * @param array $param
     */
    public function FormGet($url = "", $param = [])
    {
        ?>
        <form method="GET" action"<?= $url ?>" <?= $this->parametre($param) ?> >
        <?php
    }

    /**
     * @param string $url
     * @param array $param
     */
    public function FormPost($url = "", $param = [])
    {
        ?>
        <form method="POST" action"<?= $url ?>" <?= $this->parametre($param) ?> >
        <?php
        $this->inputHidden();
    }

    /**
     * @param $name
     * @param array $param
     */
    public function inputText($name,$param = [])
    {
        ?>
        <input type="text" name="<?= $name ?>"  <?= $this->parametre($param) ?> />
        <?php
    }


    /**
     * @param $name
     * @param array $param
     */
    public function inputPassword($name,$param = [])
    {
        ?>
        <input type="password" name="<?= $name ?>"  <?= $this->parametre($param) ?>/>
        <?php
    }

    /**
     * @param $name
     * @param array $param
     */
    public function inputEmail($name,$param = [])
    {
        ?>
        <input type="email" name="<?= $name ?>"  <?= $this->parametre($param) ?>/>
        <?php
    }

    /**
     * @param $type
     * @param $name
     * @param array $param
     */
    public function inputOther($type,$name,$param = [])
    {
        ?>
        <input type="<?= $type ?>" name="<?= $name ?>"  <?= $this->parametre($param) ?>/>
        <?php
    }

    /**
     * @param $name
     * @param array $param
     */
    public function inputRadio($name,$param = [])
    {
        ?>
        <input type="radio" name="<?= $name ?>"  <?= $this->parametre($param) ?>/>
        <?php
    }


    /**
     * @param $name
     * @param array $param
     */
    public function inputCheckbox($name,$param = [])
    {
        ?>
        <input type="checkbox" name="<?= $name ?>" <?= $this->parametre($param) ?> />
        <?php
    }

    /**
     * @param $name
     * @param array $option
     * @param array $param
     */
    public function select($name,$option = [], $param = [])
    {
        ?>
        <select name="<?= $name ?>" <?= $this->parametre($param) ?> >
            <?php foreach ($option as $key => $value): ?>
                <option value="<?= $key ?>"><?= $value ?></option>
            <?php endforeach; ?>
        </select>
        <?php
    }


    /**
     * @param $name
     * @param array $param
     */
    public function textarea($name, $param = [])
    {
        ?>
        <textarea name="<?= $name ?>"  <?= $this->parametre($param) ?> ></textarea>
        <?php
    }


    /**
     * @param $name
     * @param array $param
     * @param array $list
     */
    public function inputList($name,$param = [], $list = [])
    {
        ?>
        <input list="mylist" name="<?= $name ?>" <?= $this->parametre($param) ?> />
        <datalist id="mylist">
            <?php foreach ($list as $value): ?>
            <option value="<?= $value ?>">
                <?php endforeach; ?>
        </datalist>
        <?php
    }


    /**
     * @param $for
     * @param $text
     * @param array $param
     */
    public function label($for, $text, $param=[])
    {
        ?>
        <label for="<?= $for ?>" <?= $this->parametre($param) ?> ><?= $text ?></label>
        <?php
    }


    /**
     * @param array $param
     */
    public function submit($param = [])
    {
        ?>
        <input type="submit" <?= $this->parametre($param) ?>/>
        <?php
    }

    /**
     * @param array $param
     */
    public function button($param = [])
    {
        ?>
        <input type="button" <?= $this->parametre($param) ?>/>
        <?php
    }

    /**
     *
     */
    public function FormEnd()
    {
        ?>
        </form>
        <?php
    }
}