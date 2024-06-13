<?php $__env->startSection('site_title',__('Order Details')); ?>
<?php $__env->startSection('content'); ?>
    <div class="congratulation-area section-bg-2 pat-100 pab-100">
        <div class="container">
            <div class="congratulation-wrapper">
                <div class="congratulation-contents center-text">
                    <h4 class="congratulation-contents-title"> <?php echo e(__('Success!')); ?> </h4>
                    <p class="congratulation-contents-para"><?php echo e(__('You have successfully placed an order')); ?></p>
                    <hr>
                    <table class="table text-start">
                        <tbody>
                            <tr>
                                <th><?php echo e(__('ID')); ?></th>
                                <td>#000<?php echo e($order_details->id); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e(__('Price')); ?></th>
                                <td><?php echo e(float_amount_with_currency_symbol($order_details->price)); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e(__('Revision')); ?></th>
                                <td><?php echo e($order_details->revision == 1000 ? 'Unlimited' : $order_details->revision); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e(__('Delivery')); ?></th>
                                <td><?php echo e($order_details->delivery_time); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="btn-wrapper mt-4">
                        <a href="<?php echo e(route('client.order.details',$order_details->id)); ?>" class="btn-profile btn-bg-1"><?php echo e(__('View Details')); ?></a>
                        <a href="<?php echo e(route('homepage')); ?>" class="btn-profile btn-bg-1"><?php echo e(__('Back to Home')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/pages/order/success.blade.php ENDPATH**/ ?>