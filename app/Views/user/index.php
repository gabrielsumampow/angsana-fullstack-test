<?= $this->extend('shell/layout') ?>

<?= $this->section('content') ?>
<div class="max-w-4xl mx-auto p-4 bg-white rounded-lg shadow-md mt-8">
    <h1 class="text-2xl font-bold text-center mb-6 text-gray-700">User</h1>

    <div class="flex flex-col md:flex-row justify-between mb-4">
        <form method="get" action="<?= base_url('users/search') ?>" class="flex w-full">
            <input 
                class="flex-grow p-2 text-sm md:text-md border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                type="text" name="search" placeholder="Looking for someone? Search by name or ID...">
            <button 
                class="bg-blue-500 text-sm md:text-md text-white p-2 rounded-r-md hover:bg-blue-600 transition duration-200"
                type="submit">Search</button>
        </form>
        <a href="<?= base_url('users/create') ?>" 
            class="mt-4 md:mt-0 md:ml-4 bg-green-500 text-sm md:text-md text-center text-white px-4 py-2 rounded hover:bg-green-600 transition duration-200">
            Add User
        </a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="mb-4 p-2 bg-green-100 border border-green-400 text-green-700 rounded">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">No</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Name</th>
                    <th class="hidden md:table-cell px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Email</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="4" class="px-4 py-2 border-b text-sm text-gray-700 text-center">
                            No users found.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $i = 1 + ($pager->getCurrentPage() - 1) * $pager->getPerPage(); ?>
                    <?php foreach($users as $user): ?>
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-4 py-2 border-b text-sm text-gray-700"><?= $i++ ?></td>
                        <td class="px-4 py-2 border-b text-sm text-gray-700"><?= $user['users_name'] ?></td>
                        <td class="hidden md:table-cell px-4 py-2 border-b text-sm text-gray-700"><?= $user['users_email'] ?></td>
                        <td class="px-4 py-2 border-b text-sm text-gray-700">
                            <a href="<?= base_url('users/edit/'.$user['users_id']) ?>" 
                                class="text-blue-500 hover:underline">Edit</a>
                            <span>|</span>
                            <a href="javascript:void(0);" 
                                class="text-red-500 hover:underline" 
                                onclick="confirmDelete(<?= $user['users_id'] ?>)">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-end">
        <nav aria-label="Page navigation">
            <ul class="inline-flex items-center -space-x-px">
                <?php if ($pager->getCurrentPage() > 1) : ?>
                    <li>
                        <a href="<?= $pager->getPreviousPageURI() ?>"
                        class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 transition duration-200">
                            Previous
                        </a>
                    </li>
                <?php endif; ?>

                <?php
                $totalPages = $pager->getPageCount();
                $currentPage = $pager->getCurrentPage();
                for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li>
                        <a href="<?= $pager->getPageURI($i) ?>"
                        class="block px-3 py-2 leading-tight <?= $i == $currentPage ? 'text-white bg-blue-500' : 'text-gray-500 bg-white' ?> border border-gray-300 hover:bg-gray-100 hover:text-gray-700 transition duration-200">
                            <?= $i ?>
                        </a>
                    </li>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages) : ?>
                    <li>
                        <a href="<?= $pager->getNextPageURI() ?>"
                        class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 transition duration-200">
                            Next
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

</div>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?= base_url('users/delete/') ?>' + id;
        }
    })
}
</script>
<?= $this->endSection() ?>
