// database/migrations/xxxx_add_password_strength_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordStrengthToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('password_meets_requirements')->default(false);
            $table->json('password_strength_details')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['password_meets_requirements', 'password_strength_details']);
        });
    }
}
