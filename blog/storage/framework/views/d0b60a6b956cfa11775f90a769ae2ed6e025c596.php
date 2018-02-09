

<?php $__env->startSection('content'); ?>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Album example</h1>
                <p class="lead text-muted">Get a little taste of the life of my friends and I.
                    Come on a journey and learn a little along the way.</p>
                <p>
                    <a href="/create" class="btn btn-primary">Create Post</a>
                </p>
            </div>
        </section>

        <div class="album text-muted">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card bg-secondary" >
                            <a href="/posts/<?php echo e($post->id); ?>">
                                <h1><?php echo e(substr($post->title,0,30)); ?></h1>
                            </a>
                            <p class="card-text"><?php echo e(substr($post->description,0,120)); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('posts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>