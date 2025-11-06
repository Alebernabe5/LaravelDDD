<?php

namespace Src\admin\user\application;
use Src\admin\user\domain\contracts\UserRepositoryInterface;

class GetUserByIdUseCase
{

    private UserRepositoryInterface $userRepository; // Propiedad que usas

    // Cambié el nombre del parámetro para que sea más claro (repository)
    public function __construct(UserRepositoryInterface $repository)
    {
        // CORRECCIÓN CLAVE: Asigna el parámetro a la propiedad $userRepository
        $this->userRepository = $repository; 
    }

    public function __invoke(int $id)
    {
        // Lógica: Típicamente un caso de uso *devuelve* el resultado
        return $this->userRepository->findById($id); 
    }
    
}