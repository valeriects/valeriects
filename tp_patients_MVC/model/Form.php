<?php

class Form
{
    protected $_action;
    protected $_method;
    protected $_fields = [];
    protected $_button;
    protected $_texarea;
    protected $_select;
    protected $_radio;
    // tableau option pour les options du select:
    protected $_option = [];
    protected $_id;
    protected $_hidden;



    public function __construct($action, $method, $id)
    {
        $this->_action = $action;
        $this->_method = $method;
        $this->_id = $id;
    }

    // une fonction pour les input text:
    public function addTextField($name, $type, $value, $placeholder = NULL)
    {
        // j'envois le label et l'input dans le tableau dans la variable $_fields, donc a chaque fois que j'applique la function addTextField(), j'ajoute un input et un label
        $this->_fields[] = '<label for="' . $name . '">Votre ' . $name . '</label>
            <input type="' . $type . '" id="' . $name . '" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '"> <br>';

        // pour chainer les fonctions:
        return $this;
    }

    // une fonction pour les input hidden:
    public function addHidden($name, $type, $value, $placeholder = NULL)
    {
        // j'envois le label et l'input dans le tableau dans la variable $_fields, donc a chaque fois que j'applique la function addTextField(), j'ajoute un input et un label
        $this->_hidden = '
            <input type="' . $type . '" id="' . $name . '" name="' . $name . '" value="' . $value . '" placeholder="' . $placeholder . '"> <br>';

        // pour chainer les fonctions:
        return $this;
    }


    // une fonction pour les textarea:
    public function addTextarea($name, $text)
    {
        $this->_texarea = '<label for="' . $name . '"></label>
            <textarea name="' . $name . '" id="' . $name . '" cols="30" rows="10" placeholder="' . $name . '">' . $text . '</textarea><br>';

        // pour chainer les fonctions:
        return $this;
    }

    // une fonction pour les input radio:
    public function addRadioButton($nom, $name, $nom2, $name2)
    {
        $this->_radio = '<label for="' . $nom . '">' . $name . '</label><input type="radio" name="' . $nom . '" id="' . $nom . '"><label for="' . $nom2 . '">' . $name2 . '</label><input type="radio" name="' . $nom2 . '" id="' . $nom2 . '"><br>';

        // pour chainer les fonctions:
        return $this;
    }

    // une fonction pour le bouton validation:
    public function addSubmitButton($name)
    {
        $this->_button = '<button type="submit" name="submit" value="' . $name . '">' . $name . '</button><br>';

        // pour chainer les fonctions:
        return $this;
    }

    // ai fait une fonction pour y mettre ma balise option afn de pouvoir faire un foreach dessus dans la function addSelect($name, $id)
    public function addOption($value, $text)
    {
        $this->_option[] = '<option value="' . $value . '">' . $text . '</option><br>';

        return $this;
    }

    // une fonction pour les select et option:
    public function addSelect($name, $id)
    {
        // $this->_select = '<select name="'.$name.'" id="'.$id.'"> <option value="'.$value.'">'.$text.'</option></select><br>';

        $this->_select = '<select name="' . $name . '" id="' . $id . '">';
        // $this->_option[] = '<option value="'.$value.'">'.$text.'</option></select><br>';

        foreach ($this->_option as $otherOnce) {
            $this->_select .= $otherOnce;
        }

        $this->_select .= "</select>";
        // pour chainer les fonctions:
        return $this;
    }

    // une fonction pour afficher le formulaire dans le html:
    public function build()
    {

        // on va mettre les fonctions des input etc pr les mettre dans le html
        $html = "<form action='$this->_action' method='$this->_method' value='$this->_id'>";

        // on fait un foreach pour pouvoir prendre et afficher toute les ligne du tableau $_fields qui seront de la variable $fiedl
        foreach ($this->_fields as $field) {
            // on concatène avec le .= c'est comme si on faisait $html = $html . $field;
            $html .= $field;
        }
        // on concatène toutes les propriétés  de chaque fonction, elles contiennent tout le html qu'on veut.
        $html .= $this->_select;
        $html .= $this->_radio;
        $html .= $this->_texarea;
        $html .= $this->_hidden;
        // on peut faire $this->button car la variable/propriété est déclarée dans les propriétés.
        $html .= $this->_button;
        // veut dire concaténation $html = $html . $this->button;
        $html .= "</form>";
        // veut dire concaténation $html = $html . "</form>"; 

        // on sait qu'on va retourner quelque chose. Ici au lieu de return $this, on retourne la variable $html, qui comprend tout le hmtl input texte et bouton.
        return $html;
    }
}
