<?php

namespace App\Models\Banner\Traits\Attribute;

use Carbon\Carbon as Carbon;

/**
 * Class BannerAttribute.
 */
trait BannerAttribute
{
    public function getPcImageAttribute()
    {
        return get_image($this->pc_image_id);
    }

    public function getMobileImageAttribute()
    {
        return get_image($this->mobile_image_id);
    }

    public function getCreatedAtAttribute($date)
    {
        if (request()->expectsJson()) {
            return Carbon::parse($date)->format('Y年m月d日');
        }

        if (Carbon::now() < Carbon::parse($date)->addDays(7)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }

    /**
     * @return string
     */
    public function getUpdatedAtAttribute($date)
    {
        if (request()->expectsJson()) {
            return Carbon::parse($date)->format('Y年m月d日');
        }

        if (Carbon::now() < Carbon::parse($date)->addDays(7)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }

    /**
     * @return string
     */
    public function getStatusDescAttribute()
    {
        $desc = '<span class="text-danger"><i class="fa fa-ban"></i> 未知</span>';

        switch ($this->attributes['status']) {
            case 0:
                $desc = '<span class="text-warning"><i class="fa fa-ban"></i> 停用</span>';
                break;
            case 1:
                $desc = '<span class="text-success"><i class="fa fa-check-circle"></i> 启用</span>';
                break;
        }
        
        return $desc;
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute($route = '')
    {
        return '<a href="'. (!empty($route) ? route($route, $this) : '#') .'" class="m-r-5 text-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute($route = '')
    {
        if ($this->is_system != 1) {
            switch ($this->status) {
                case 0:
                    return '<a href="#" data-comfirm="true" data-method="GET" data-message="' . __('alerts.general.comfirm.active') . '" data-action="' . (!empty($route) ? route($route, [$this, 1]) : '#') . '" class="m-r-5 text-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.activate').'"></i></a> ';
                // No break

                case 1:
                    return '<a href="#" data-comfirm="true" data-method="GET" data-message="' . __('alerts.general.comfirm.disable') . '" data-action="' . (!empty($route) ? route($route, [$this, 0]) : '#') . '" class="m-r-5 text-warning"><i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.deactivate').'"></i></a> ';
                // No break

                default:
                    return '';
                // No break
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute($route = '')
    {
        if ($this->is_system != 1) {
            return '<a href="#" data-comfirm="true" data-method="POST" data-message="' . __('alerts.general.comfirm.destroy') . '" data-action="destroy-form-' . $this->id . '" class="m-r-5 text-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i><form id="destroy-form-'.$this->id.'" action="'. (!empty($route) ? route($route, $this) : '#') .'" method="POST" style="display: none;">'.csrf_field() . method_field('DELETE').'</form></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute($route = '')
    {
        return '<a href="#" data-comfirm="true" data-method="GET" data-message="' . __('alerts.general.comfirm.restore') . '" data-action="'. (!empty($route) ? route($route, $this) : '#') .'" class="m-r-5 text-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.restore').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute($route = '')
    {
        return '<a href="#" data-comfirm="true" data-method="GET" data-message="' . __('alerts.general.comfirm.delete') . '" data-action="'. (!empty($route) ? route($route, $this) : '#') .'" class="m-r-5 text-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.delete_permanently').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return $this->getRestoreButtonAttribute('backend.content.banner.restore').
                $this->getDeletePermanentlyButtonAttribute('backend.content.banner.forcedelete');
        }

        return
            $this->getEditButtonAttribute('backend.content.banner.edit').
            $this->getDeleteButtonAttribute('backend.content.banner.destroy');
    }

}
