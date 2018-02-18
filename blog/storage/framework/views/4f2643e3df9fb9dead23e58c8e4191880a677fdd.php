

<?php $__env->startSection('content'); ?>
    <section class="jumbotron text-left">
        <div class="container">
            <form method="POST" action="/posts">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" placeholder="title" name="title">
                </div>

                <div class="form-group">
                    <label for="body">Synopsis</label>
                    <textarea type="text" class="form-control" placeholder="synopsis" name="synopsis"></textarea>
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea type="text" class="form-control" placeholder="body" name="body"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
            <?php if(count($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('posts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>