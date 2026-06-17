<?php $__env->startSection('title', 'Masuk - Jokss Cihuyy'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Tombol Close -->
    <a href="/" class="fixed top-6 right-6 text-gray-400 hover:text-white transition text-2xl z-50">&times;</a>

    <!-- Container Login -->
    <div class="w-full max-w-md bg-[#1f2125] p-8 rounded-2xl shadow-2xl border border-gray-800">

        <h2 class="text-3xl font-black text-white mb-2">Masuk</h2>
        <p class="text-gray-400 mb-8 text-sm">Masuk dengan akun yang telah Kamu daftarkan.</p>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Username -->
            <div class="mb-5">
                <label for="username" class="block text-sm font-bold text-gray-300 mb-2">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" value="<?php echo e(old('username')); ?>" required autofocus
                    class="w-full bg-[#121316] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#5bcfe6] transition">
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-xs mt-1 block"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Password -->
            <div class="mb-5 relative">
                <label for="password" class="block text-sm font-bold text-gray-300 mb-2">Kata sandi</label>
                <input type="password" id="password" name="password" placeholder="Kata sandi" required
                    class="w-full bg-[#121316] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#5bcfe6] transition">
            </div>

            <!-- Options -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember_me" name="remember" class="accent-[#5bcfe6]">
                    <label for="remember_me" class="text-xs text-gray-400 font-bold">Ingat akun ku</label>
                </div>
                <a href="<?php echo e(route('password.request')); ?>" class="text-xs text-[#5bcfe6] hover:underline font-bold">Lupa kata sandi?</a>
            </div>

            <!-- Tombol Masuk -->
            <button type="submit" class="w-full bg-[#5bcfe6] hover:bg-[#4ab8ce] text-black font-black py-3 rounded-xl transition hover:-translate-y-1 text-sm flex items-center justify-center gap-2">
                Masuk Sekarang
            </button>

            <p class="text-center text-xs text-gray-500 mt-6">Belum memiliki akun? <a href="<?php echo e(route('register')); ?>" class="text-[#5bcfe6] font-bold hover:underline">Daftar</a></p>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth-split', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PWEB\05-03-2026 (Pertemuan 2)\Joki Game\A_PWEB_KAVIN\resources\views/auth/login.blade.php ENDPATH**/ ?>