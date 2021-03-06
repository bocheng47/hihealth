<?php $__env->startSection('contents'); ?>
<h3>
    <i class="fa fa-list-alt"></i>
    員工管理 - 員工列表
</h3>
<hr />
<div class="row">
    <div class="col-md-12 links clearfix">
        <a href="<?php echo e(route('admin-doctors-add-form')); ?>" class="pull-right"><i class="fa fa-plus"></i> 新增員工</a>
    </div>
</div>
<div id="doctors-table" class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>編號</th>
                <th>姓名</th>
                <th>職稱</th>
                <th>帳號</th>
                <th>縣市</th>
                <th>區域</th>
                <th>狀態</th>
                <th>會員期限</th>
                <th>功能</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td class="text-right" colspan="7"><?php echo e($users); ?></td>
            </tr>
        </tfoot>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($user->doctor->id); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin-services-list-by-doctor', ['doctor_id' => $user->id])); ?>"><?php echo e($user->name); ?></a>
                    </td>
                    <td><?php echo e($user->doctor->title); ?></td>
                    <td><?php echo e($user->account); ?></td>
                    <td><?php echo e($user->city); ?></td>
                    <td><?php echo e($user->district); ?></td>
                    <td><?php echo e($user->status ? '啟用' : '停用'); ?></td>
                    <td>
                        <?php if($user->doctor->is_valid): ?>
                            <?php if($user->doctor->due_at): ?>
                                <?php echo e($user->doctor->due_at->toDateString()); ?>

                                剩餘<?php echo e($user->doctor->due_at->diffInDays(\Carbon\Carbon::today())); ?>天
                            <?php endif; ?>
                        <?php else: ?>
                            已過期
                        <?php endif; ?>
                            
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin-doctors-edit-form', ['doctor_id' => $user->id])); ?>">修改</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td class="text-center" colspan="7">目前沒有資料</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>