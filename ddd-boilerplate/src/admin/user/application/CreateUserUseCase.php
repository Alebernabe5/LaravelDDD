<?php

namespace Src\admin\user\application;

use Src\admin\user\domain\contracts\UserRepositoryInterface;
use Src\admin\user\domain\value_objects\UserEmail;
use Src\admin\user\domain\value_objects\UserName;
// Corregido: Importamos la Entidad de la capa de Dominio, no de Aplicación
use Src\admin\user\domain\entities\User; 

class CreateUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(int $id, string $name, string $email): void // Es buena práctica declarar el retorno
    {
        // 1. Crear Value Objects (Validación implícita)
        $nameValueObject = new UserName($name);
        $emailValueObject = new UserEmail($email);
        
        // 2. Crear la Entidad de Dominio
        $user = new User($id, $nameValueObject, $emailValueObject);

        // 3. Persistir la Entidad usando el Contrato del Repositorio
        $this->userRepository->save($user);
    }
}