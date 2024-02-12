<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Profile;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use EsperoSoft\Faker\Faker;


class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = new Faker();
        $users = [];
        for ($i = 0; $i <100 ; $i++){

            $user =( new User())->setFulName($faker-> full_name()) 
                                ->setEmail($faker-> email()) 
                                ->setPassword(sha1("rihab"))
                                ->setCreatedAt($faker->dateTimeImmutable())
            ;
            $address= (new Address())->setStreet($faker -> streetAddress())

                                     -> setCodePostal($faker -> codePostal())
                                     ->setCity($faker->city())
                                     ->setCountry($faker->country())
            ;

            // $profile= (new Profile())->setPicture($faker -> image())
            //                          ->setCoverPicture($faker -> image())
            //                          ->setDescription($faker -> description(60))
            //                          ->setCreatedAt($faker ->dateTimeImmutable())

                                     
            // ;



            $user->addAddress($address);
          //  $user->setProfile($profile);
            $users =$user;
            $manager->persist($user);
            $manager->persist($address);



        }
      
        $manager->flush();
    }
}
