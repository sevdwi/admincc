<?php  
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandCenter extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'nama_user',
        'nomor_hp',
        'passwords',
    ];
}
