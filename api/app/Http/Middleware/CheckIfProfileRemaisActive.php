<?php

namespace App\Http\Middleware;

use App\Exceptions\ValidacaoCustomizadaException;
use App\Modules\Conta\Model\Funcionalidade;
use App\Modules\Conta\Model\Perfil;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CheckIfProfileRemaisActive
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws ValidacaoCustomizadaException
     */
    public function handle($request, Closure $next)
    {
        $usuario = auth()->user();

        $cacheProfileAndFunctionalities = Perfil::allWitCache();
        $currentProfile = $usuario->getPerfilAtivo();

        $this->verifyIfCurrentProfileIsActive($currentProfile, $cacheProfileAndFunctionalities);

        $currentRoute = $request->route()->getName();

        $currentProfileInCache = $cacheProfileAndFunctionalities->where('co_perfil', $currentProfile->co_perfil)->first();

        $this->veryfyIfCurrentRouteIsActive($currentRoute, $currentProfileInCache);


        return $next($request);
    }

    /**
     * @param $currentProfile
     * @param Collection $profile
     * @return bool
     * @throws ValidacaoCustomizadaException
     */
    private function verifyIfCurrentProfileIsActive($currentProfile, $profile)
    {

        $profileNotActive = function (Perfil $perfil) use ($currentProfile) {
            return !$perfil->st_ativo && $perfil->co_perfil == $currentProfile->co_perfil;
        };

        $caseNoActiveFail = $profile->contains($profileNotActive);

        if ($caseNoActiveFail) {
            throw new ValidacaoCustomizadaException("O seu perfil foi inativado!", 403);
        }

        return true;
    }


    /**
     * @param $currentRouteName
     * @param Perfil $profile
     * @return bool|Closure
     * @throws ValidacaoCustomizadaException
     */
    private function veryfyIfCurrentRouteIsActive($currentRouteName, $profile)
    {

        $funcionalityNotActive = function (Funcionalidade $funcionalidade) use ($currentRouteName) {
            return !$funcionalidade->st_ativo && $funcionalidade->no_rota == $currentRouteName;
        };

        $nonexistentFuncionality = function (Funcionalidade $funcionalidade) use ($currentRouteName) {
            return $funcionalidade->no_rota == $currentRouteName;
        };

        $caseNoActiveFail = $profile->funcionalidades->contains($funcionalityNotActive);

        if ($caseNoActiveFail) {
            throw new ValidacaoCustomizadaException("A funcionalidade solicitada está desativada!", 403);
        }

        $caseNonexistentFail = $profile->funcionalidades->contains($nonexistentFuncionality);

        if (!$caseNonexistentFail) {
            throw new ValidacaoCustomizadaException("O seu perfil não possui a funcionalidade solicitada!", 403);
        }

        return true;
    }
}
