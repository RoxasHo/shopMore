<?php

//HKH

namespace App\Repository;

use App\Models\User;

class ProfileRepo implements iProfileRepo {

    public function getAllUserProfiles() {
        return User::all();
    }

}