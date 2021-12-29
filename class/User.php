<?php


class User extends Controller
{
    use Helper;

    // const -- pristapuvamme do nejze direktno so klasata primer User::MARTIN ili vnatre vo klasata so self::
    const MARTIN = 'Martin Karadzinov';


    // geteri i seteri


    // methods - public (imaat akces preku objektot/ private imaat aaccess preku klasata / protected - access na nasleduvanje

    private $id;
    public $name;
    private $password;
    public $agree;
    public $created_at;
    public $updated_at;
    public $image;
    public $status;
    public $employed;
    public $title;
    public $email;


    private $conn;


    public function __construct()
    {

        // bidejki nasleduvame DB class, treba da go povikame konstruktorot od nasledenata klasa za da se setiraat metodite tamo

        parent::__construct('users');


        // parent:: ni povikuva nasledena klasa -

        // parent::connect() pristapuva do protected funckiija

        $this->conn = parent::connect();

    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAgree()
    {
        return $this->agree;
    }

    /**
     * @param mixed $agree
     */
    public function setAgree($agree)
    {
        $this->agree = $agree;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getEmployed()
    {
        return $this->employed;
    }

    /**
     * @param mixed $employed
     */
    public function setEmployed($employed)
    {
        $this->employed = $employed;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    public static function returnName()
    {
        return self::MARTIN;

    }

    public function isConnected()
    {
        if ($this->conn) {
            return true;
        }

        return false;
    }

    public function save()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'image' => $this->image
        ];


        $this->id = parent::insert($data);
        return $this->getSelf();
    }



    public function updateUser()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'image' => $this->image
        ];

        parent::update($data, $this->id);
        return $this->getSelf();
    }

    public function getSelf()
    {
        $user = parent::get($this->id);

        $this->id           = $user['id'];
        $this->name         = $user['name'];
        $this->password     = $user['password'];
        $this->created_at   = $user['created_at'];
        $this->updated_at   = $user['updated_at'];
        $this->image        = $user['image'];
        $this->email        = $user['email'];

        return $this;
    }

    public function getUser($id)
    {
        $user = parent::get($id);

        $this->id           = $user['id'];
        $this->name         = $user['name'];
        $this->password     = $user['password'];
        $this->created_at   = $user['created_at'];
        $this->updated_at   = $user['updated_at'];
        $this->image        = $user['image'];
        $this->email        = $user['email'];

        return $this;
    }

    public function getUsers()
    {
        $all = [];
        $users = parent::all();
        foreach($users as $user)
        {
            $u = new User();
            $u->setName($user['name']);
            $u->setEmail($user['email']);
            $u->setPassword($user['password']);
            $u->setImage($user['image']);
            $u->setCreatedAt($user['created_at']);
            $u->setUpdatedAt($user['updated_at']);

            $all[] = $u;
        }


        return $all;

    }

    public function deleteUser()
    {
        return parent::delete($this->id);
    }

}