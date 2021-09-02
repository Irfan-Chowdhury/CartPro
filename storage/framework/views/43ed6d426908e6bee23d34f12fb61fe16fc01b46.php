<div class="card">
    <h3 class="card-header p-3"><b>Mail</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                
                <form id="mailSubmit">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Mail From Address</b></label>
                        <div class="col-sm-8">
                            <input type="email" name="mail_address" class="form-control" <?php if(isset($setting_mail->mail_address)): ?> value="<?php echo e($setting_mail->mail_address); ?>" <?php endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Mail From Name</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="mail_name" class="form-control" <?php if(isset($setting_mail->mail_name)): ?> value="<?php echo e($setting_mail->mail_name); ?>" <?php endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Mail Host</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="mail_host" class="form-control" <?php if(isset($setting_mail->mail_host)): ?> value="<?php echo e($setting_mail->mail_host); ?>" <?php endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Mail Port</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="mail_port" class="form-control" <?php if(isset($setting_mail->mail_port)): ?> value="<?php echo e($setting_mail->mail_port); ?>" <?php endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Mail Username</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="mail_username" class="form-control" <?php if(isset($setting_mail->mail_username)): ?> value="<?php echo e($setting_mail->mail_username); ?>" <?php endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Mail Password</b></label>
                        <div class="col-sm-8">
                            <input type="password" name="mail_password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Mail Encryption</b></label>
                        <div class="col-sm-8">
                            <select name="mail_encryption" class="form-control">
                                <option value="">-- Select Encryption --</option>
                                <option value="Tls" <?php if(isset($setting_mail->mail_encryption)): ?> <?php echo e($setting_mail->mail_encryption=="Tls" ? 'selected':''); ?> <?php endif; ?>>Tls</option>
                                <option value="SSL" <?php if(isset($setting_mail->mail_encryption)): ?> <?php echo e($setting_mail->mail_encryption=="SSL" ? 'selected':''); ?> <?php endif; ?>>SSL</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <h3 class="text-bold">Customer Notification Settings</h3>
                    <br>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Welcome Email</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="welcome_email" class="form-check-input" <?php if(isset($setting_mail->welcome_email)): ?> <?php echo e($setting_mail->welcome_email=="1" ? 'checked':''); ?> <?php endif; ?>>
                                <label class="p-0 form-check-label" for="exampleCheck1">Send welcome email after registration</label>
                            </div>
                        </div>
                    </div>


                    <br>
                    <h3 class="text-bold">Order Notification Settings</h3>
                    <br>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>New Order Admin Email</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="new_order_to_admin" class="form-check-input" <?php if(isset($setting_mail->new_order_to_admin)): ?> <?php echo e($setting_mail->new_order_to_admin=="1" ? 'checked':''); ?> <?php endif; ?>>
                                <label class="p-0 form-check-label" for="exampleCheck1">Send new order notification to the admin</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Invoice Email</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="invoice_mail" class="form-check-input" <?php if(isset($setting_mail->invoice_mail)): ?> <?php echo e($setting_mail->invoice_mail=="1" ? 'checked':''); ?> <?php endif; ?>>
                                <label class="p-0 form-check-label" for="exampleCheck1">Send invoice email to the customer after checkout</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Email Order Status</b></label>
                        <div class="col-sm-8">
                            <select name="mail_order_status" class="form-control">
                                <option value="">-- Select Status --</option>
                                <option value="canceled" <?php if(isset($setting_mail->mail_order_status)): ?> <?php echo e($setting_mail->mail_order_status=="canceled" ? 'selected':''); ?> <?php endif; ?>><?php echo e(ucfirst("canceled")); ?></option>
                                <option value="completed" <?php if(isset($setting_mail->mail_order_status)): ?> <?php echo e($setting_mail->mail_order_status=="completed" ? 'selected':''); ?> <?php endif; ?>><?php echo e(ucfirst("completed")); ?></option>
                                <option value="on_hold" <?php if(isset($setting_mail->mail_order_status)): ?> <?php echo e($setting_mail->mail_order_status=="on_hold" ? 'selected':''); ?> <?php endif; ?>><?php echo e(ucfirst("on hold")); ?></option>
                                <option value="pending" <?php if(isset($setting_mail->mail_order_status)): ?> <?php echo e($setting_mail->mail_order_status=="pending" ? 'selected':''); ?> <?php endif; ?>><?php echo e(ucfirst("pending payment")); ?></option>
                                <option value="processing" <?php if(isset($setting_mail->mail_order_status)): ?> <?php echo e($setting_mail->mail_order_status=="processing" ? 'selected':''); ?> <?php endif; ?>><?php echo e(ucfirst("processing payment")); ?></option>
                                <option value="refunded" <?php if(isset($setting_mail->mail_order_status)): ?> <?php echo e($setting_mail->mail_order_status=="refunded" ? 'selected':''); ?> <?php endif; ?>><?php echo e(ucfirst("refunded")); ?></option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>
</div>





<?php /**PATH C:\xampp\htdocs\3_cartpro_menu\resources\views/admin/pages/setting/general_setting/mail.blade.php ENDPATH**/ ?>