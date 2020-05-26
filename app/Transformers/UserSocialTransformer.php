<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\UserSocial;

/**
 * Class UserSocialTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserSocialTransformer extends TransformerAbstract
{
    /**
     * Transform the UserSocial entity.
     *
     * @param \App\Entities\UserSocial $model
     *
     * @return array
     */
    public function transform(UserSocial $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
