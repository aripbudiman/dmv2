<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    protected $table            = 'members';
    protected $allowedFields    = ['member'];
}
