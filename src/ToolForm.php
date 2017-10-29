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
    private $key_csfr;

    /**
     * Form constructor.
     * @param $key_token
     */
    public function __construct($key_csfr)
    {
        $this->key_csfr = $key_csfr;
    }

    #Methode private

    /**
     * Input de type hidden pout stocker la clef csfr
     */
    private function inputHidden()
    {
        ?>
        <input type="hidden" name="_token" value="<?= $this->key_csfr ?>"/>
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

    /**
     * @param $name
     * @throws ToolFormExeption
     */
    private function verificationName($name){
        if (empty($name)){
            throw new ToolFormExeption('Il manque la valeur name de la balise input');
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
        $this->inputHidden();
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
    public function inputText($name, $param = [])
    {
        $this->verificationName($name);
        ?>
        <input type="text" name="<?= $name ?>"  <?= $this->parametre($param) ?> />
        <?php
    }


    /**
     * @param $name
     * @param array $param
     */
    public function inputPassword($name, $param = [])
    {
        $this->verificationName($name);
        ?>
        <input type="password" name="<?= $name ?>"  <?= $this->parametre($param) ?>/>
        <?php
    }

    /**
     * @param $name
     * @param array $param
     */
    public function inputEmail($name, $param = [])
    {
        $this->verificationName($name);
        ?>
        <input type="email" name="<?= $name ?>"  <?= $this->parametre($param) ?>/>
        <?php
    }

    /**
     * @param $type
     * @param $name
     * @param array $param
     * @throws ToolFormExeption
     */
    public function inputOther($type,$name,$param = [])
    {
        if (empty($type)){
            throw new ToolFormExeption('Type in difine');
        }
        $this->verificationName($name);
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
        $this->verificationName($name);
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
        $this->verificationName($name);
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
        $this->verificationName($name);
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
        $this->verificationName($name);
        ?>
        <textarea name="<?= $name ?>"  <?= $this->parametre($param) ?> ></textarea>
        <?php
    }


    /**
     * @param $name
     * @param array $param
     * @param array $list
     */
    public function inputList($name, $param = [], $list = [])
    {
        $this->verificationName($name);
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
     * Label de la balise input
     *
     * @param $text
     * @param array $param
     * @param string $for
     * @throws ToolFormExeption
     */
    public function label($text, $param = [], $for = '')
    {
        if (empty($text)){ throw new ToolFormExeption('The text of label indifine'); }
        $for = (!empty($for))? '' : 'for="' . $for . '"';

        ?>
        <label <?= $for ?> <?= $this->parametre($param) ?> ><?= $text ?></label>
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
     * Pour fermer la balise form
     */
    public function FormEnd()
    {
        ?>
        </form>
        <?php
    }
}