<?php

class Products extends Controller
{

    use Helper;

    private $id;
    private $name;
    private $cat_id;
    private $user_id;
    private $quantity;
    private $price;
    private $description;
    private $image;
    private $created_at;
    private $updated_at;


    public function __construct()
    {
        $this->id = 4;
        parent::__construct('products');
    }

    public function getSelf()
    {
        $product = parent::get($this->id);

        $this->name = $product['name'];
        $this->cat_id = $product['cat_id'];
        $this->user_id = $product['user_id'];
        $this->quantity = $product['quantity'];
        $this->price = $product['price'];
        $this->description = $product['description'];
        $this->image = $product['image'];
        $this->created_at = $product['created_at'];
        $this->updated_at = $product['updated_at'];

        return $this;
    }

    public function getProduct($id)
    {
        $product = parent::get($id);

        $this->id = $product['id'];
        $this->name = $product['name'];
        $this->cat_id = $product['cat_id'];
        $this->user_id = $product['user_id'];
        $this->quantity = $product['quantity'];
        $this->price = $product['price'];
        $this->description = $product['description'];
        $this->image = $product['image'];
        $this->created_at = $product['created_at'];
        $this->updated_at = $product['updated_at'];

        return $this;
    }

    public function getProducts()
    {
        $all = [];
        $products = parent::all();
        foreach ($products as $product) {

            $p = new Products();

            $p->setId($product['id']);
            $p->setName($product['name']);
            $p->setCatId($product['cat_id']);
            $p->setUserId($product['user_id']);
            $p->setQuantity($product['quantity']);
            $p->setPrice($product['price']);
            $p->setDescription($product['description']);
            $p->setImage($product['image']);
            $p->setCreatedAt($product['created_at']);
            $p->setUpdatedAt($product['updated_at']);

            $all[] = $p;
        }

        return $all;

    }

    public function updateProduct()
    {

        $data = [
            'name'          => $this->name,
            'cat_id'        => $this->cat_id,
            'user_id'       => $this->user_id,
            'quantity'      => $this->quantity,
            'price'         => $this->price,
            'description'   => $this->description,
            'image'         => $this->image,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at
        ];

        parent::update($data, $this->id);
        return $this->getSelf();
    }

    public function save()
    {
        $data = [
            'name'          => $this->name,
            'cat_id'        => $this->cat_id,
            'user_id'       => $this->user_id,
            'quantity'      => $this->quantity,
            'price'         => $this->price,
            'description'   => $this->description,
            'image'         => $this->image,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at
        ];


        $this->id = parent::insert($data);
        return $this->getSelf();
    }

    public function deleteProduct()
    {
        return parent::delete($this->id);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->cat_id;
    }

    /**
     * @param mixed $cat_id
     */
    public function setCatId($cat_id)
    {
        $this->cat_id = $cat_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }


}