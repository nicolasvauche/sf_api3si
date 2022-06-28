<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $post = new Post();
        $post->setTitle('Mon premier article')
            ->setSlug('mon-premier-article')
            ->setMedia('mon-premier-article.png')
            ->setContent('<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ducimus officia optio sequi tempora? Deserunt distinctio ducimus, eos error esse facilis fugiat hic ipsa ipsum laudantium possimus, repudiandae sint sunt.</p>')
            ->setOnline(true)
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($post);

        $post = new Post();
        $post->setTitle('Mon deuxième article')
            ->setSlug('mon-deuxieme-article')
            ->setMedia('mon-deuxieme-article.png')
            ->setContent('<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ducimus officia optio sequi tempora? Deserunt distinctio ducimus, eos error esse facilis fugiat hic ipsa ipsum laudantium possimus, repudiandae sint sunt.</p>')
            ->setOnline(true)
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($post);

        $manager->flush();
    }
}
