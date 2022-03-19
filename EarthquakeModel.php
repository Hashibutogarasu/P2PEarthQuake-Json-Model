<?php

class EarthquakeModel{
    public $_id;
    public $time;
    public $created_at;
    public $code;
    public $issue;
    public $earthquake;
    public $points;
    public $count;
    
    function __construct($data,$index){
        $this->_id = new _id($data,$index);
        $this->time = $data[$index]["time"];
        $this->created_at = $data[$index]["created_at"];
        $this->code = $data[$index]["code"];
        $this->issue = new issue($data,$index);
        $this->earthquake = new earthquake($data,$index);
        $this->points = new points($data,$index);
        $this->count = (new points($data,$index))->count();
    }
}

class _id{
    public $oid;

    function __construct($data,$index)
    {
        $this->oid = $data[$index]["_id"]["\$oid"];
    }
}

class issue{
    public $source;
    public $type;

    function __construct($data,$index)
    {
        $this->source = $data[$index]["issue"]["source"];
        $this->type = $data[$index]["issue"]["type"];
    }
}

class earthquake{
    public $time;
    public $maxScale;
    public $domesticTsunami;
    public $hypocenter;

    function __construct($data,$index)
    {
        $this->time = $data[$index]["earthquake"]["time"];
        $this->maxScale = $data[$index]["earthquake"]["maxScale"];
        $this->domesticTsunami = $data[$index]["earthquake"]["domesticTsunami"];
        $this->hypocenter = new hypocenter($data,$index);
    }
}

class hypocenter{
    public $name;
    public $depth;
    public $magnitude;
    public $latitude;
    public $longitude;

    function __construct($data,$index)
    {
        $this->name = $data[$index]["earthquake"]["hypocenter"]["name"];
        $this->depth = $data[$index]["earthquake"]["hypocenter"]["depth"];
        $this->magnitude = $data[$index]["earthquake"]["hypocenter"]["magnitude"];
        $this->latitude = $data[$index]["earthquake"]["hypocenter"]["latitude"];
        $this->longitude = $data[$index]["earthquake"]["hypocenter"]["longitude"];
    }
}

class points{
    public $array;
    private $data;
    private $index;
    
    function __construct($data,$index)
    {
        $this->array = $data[$index]["points"];
        $this->data = $data;
        $this->index = $index;
    }

    function get($index){
        return new quakes($this->data,$this->index,$index);
    }

    public function count(){
        if(isset($this->array)){
            return count($this->array);
        }
        else{
            return 0;
        }
    }
}

class quakes{
    public $scale;
    public $addr;

    function __construct($data,$index,$index2){
        $this->scale = $data[$index]["points"][$index2]["scale"];
        $this->addr = $data[$index]["points"][$index2]["addr"];
    }
}