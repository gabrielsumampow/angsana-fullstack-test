<?= $this->extend('shell/layout') ?>

<?= $this->section('content') ?>
<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
    <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center"><?= isset($user) ? 'Edit User' : 'Add New User' ?></h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= isset($user) ? base_url('users/update/'.$user['users_id']) : base_url('users/store') ?>">
        <?= csrf_field() ?>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="users_name">Name</label>
            <input
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                type="text" name="users_name" id="users_name" value="<?= old('users_name', isset($user) ? $user['users_name'] : '') ?>" placeholder="Enter your name" required>

            <?php if (isset($validation) && $validation->hasError('users_name')): ?>
                <span class="text-sm text-red-500"><?= $validation->getError('users_name') ?></span>
            <?php endif; ?>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700" for="users_email">Email</label>
            <input
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                type="email" name="users_email" id="users_email" value="<?= old('users_email', isset($user) ? $user['users_email'] : '') ?>" placeholder="Enter your email" required>
            <?php if (isset($validation) && $validation->hasError('users_email')): ?>
                <span class="text-sm text-red-500"><?= $validation->getError('users_email') ?></span>
            <?php endif; ?>
        </div>

        <div class="flex justify-end">
            <button
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200"
                type="submit">
                <?= isset($user) ? 'Update' : 'Create' ?>
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
