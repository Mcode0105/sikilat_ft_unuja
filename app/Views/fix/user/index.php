<?= $this->extend('layout/templateuser'); ?>
<?php $this->section('conten') ?>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-6">
        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                    <img height="100px" width="100px" src="/asset/file/<?= session()->get('foto'); ?>" alt="AdminBSB - Profile Image" />
                </div>
                <div class="content-area">
                    <p>Welcome to Application</p>
                    <h3><?= session()->get('nama'); ?></h3>
                    <p>User</p>
                </div>
            </div>
            <div class="profile-footer">
                <button class="btn btn-primary btn-lg waves-effect btn-block">edit</button>
            </div>
        </div>
    </div>
    <?php $this->endSection() ?>