<?php

namespace Src\admin\user\infrastructure\repositories;

use Src\admin\user\domain\contracts\UserRepositoryInterface;
use App\Models\User as EloquentUser;
use Src\admin\user\domain\value_objects\UserName;
// ✅ IMPORTACIONES FALTANTES: Necesarias para findById y save
use Src\admin\user\domain\entities\User; 
use Src\admin\user\domain\value_objects\UserEmail;


class EloquentUserRepository implements UserRepositoryInterface
{
    // --- 1. findById (Mapeo de Eloquent Model a Domain Entity) ---
    public function findById(int $id): ?User
    {
        $user = EloquentUser::find($id);

        if (!$user) {
            return null;
        }

        // Mapea los datos del Modelo ORM al objeto de Entidad de Dominio
        return new User(
            $user->id,
            new UserName($user->name), 
            new UserEmail($user->email) // Asumo que el modelo de Eloquent tiene una columna 'email'
        );
    }
    
    // --- 2. save (Mapeo de Domain Entity a Eloquent Model) ---
    // ✅ Método colocado correctamente dentro de la clase
    public function save(User $user): void
    {
        // ✅ Corrección: Cambiado 'updatedOrCreate' por 'updateOrCreate'
        EloquentUser::updateOrCreate(
            // Criterio de búsqueda/identificación
            ['id' => $user->id()],
            // Datos a actualizar/crear
            [
                'name' => $user->name()->value(), // Asumo que tu columna en BD es 'name'
                'email' => $user->email()->value()
            ]
        );
    }

} // ✅ ÚNICO corchete de cierre de la clase