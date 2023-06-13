<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** 
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('tlp');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            // $table->string('username');
            $table->string('email')->unique();
            $table->text('password');
            // $table->foreignid('outlet_id')->constrained('outlets')->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->enum('role', ['admin', 'kasir', 'owner']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignid('outlet_id')->constrained('outlets')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('kode_invoice');
            $table->foreignid('member_id')->constrained('members')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->datetime('tgl');
            $table->datetime('tgl_bayar');
            $table->string('biaya_tambahan')->unique();
            $table->string('diskon')->unique();
            $table->string('pajak')->unique();
            $table->enum('status', ['baru', 'proses', 'selesai', 'diambil']);
            $table->enum('dibayar', ['dibayar', 'belum_dibayar']);
            $table->foreignid('user_id')->constrained('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->foreignid('outlet_id')->constrained('outlets')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('jenis', ['kiloan', 'selimut', 'bed_cover', 'kaos', 'lain-lain']);
            $table->string('nama_paket');
            $table->integer('harga')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignid('transaksi_id')->constrained('transaksis')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignid('paket_id')->constrained('pakets')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->double('qty')->unique();
            $table->text('keterangan');
            $table->rememberToken();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
        Schema::dropIfExists('outlets');
        Schema::dropIfExists('detail_transaksis');
        Schema::dropIfExists('transaksis');
        Schema::dropIfExists('members');
        Schema::dropIfExists('users');
    }
};
