<?php

namespace App\Presenters;

use App\Transformers\UserSocialTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserSocialPresenter.
 *
 * @package namespace App\Presenters;
 */
class UserSocialPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserSocialTransformer();
    }
}
