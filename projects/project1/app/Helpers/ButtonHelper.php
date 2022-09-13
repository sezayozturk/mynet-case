<?php

namespace App\Helpers;

class ButtonHelper
    {
        static function createButton(string $link, array $settings = []): string
            {
                $default = [
                    'title' => __('app.create'),
                    'class' => 'btn btn-az-primary btn-with-icon iframe',
                    'classExtra' => '',
                    'dataFunctionName' => 'create',
                    'dataMaxWidth' => '600px',
                    'dataMaxHeight' => '500px',
                    'dataExtra' => '',
                ];

                $settings = array_merge($default, $settings);

                return view('admin.template.buttons.create', ['link' => $link, 'settings' => $settings])->render();
            }

        static function filterButton(array $settings = []): string
            {
                $default = [
                    'icon' => '',
                    'title' => __('app.create'),
                    'class' => 'btn btn-az-primary btn-with-icon iframe',
                    'classExtra' => '',
                    'dataFunctionName' => 'create',
                    'dataMaxWidth' => '600px',
                    'dataMaxHeight' => '500px',
                    'dataExtra' => '',
                ];
                $settings = array_merge($default, $settings);

                return view('admin.template.buttons.create', ['link' => $link, 'settings' => $settings])->render();
            }

        static function editButton(string $link, array $settings = []): string
            {
                $default = [
                    'icon' => 'typcn typcn-edit',
                    'title' => __('app.edit'),
                    'class' => 'btn btn-az-primary btn-icon p-0 m-0 iframe',
                    'classExtra' => '',
                    'dataFunctionName' => 'update',
                    'dataMaxWidth' => '600px',
                    'dataMaxHeight' => '500px',
                    'dataExtra' => '',
                ];

                $settings = array_merge($default, $settings);

                return view('admin.template.buttons.edit', ['link' => $link, 'settings' => $settings])->render();
            }
        static function editButtonBig(string $link, array $settings = []): string
            {
                $default = [
                    'icon' => 'typcn typcn-edit',
                    'title' => __('app.edit'),
                    'class' => 'btn btn-az-primary btn-with-icon p-0 m-0 update',
                    'classExtra' => '',
                    'dataFunctionName' => 'update',
                    'dataMaxWidth' => '600px',
                    'dataMaxHeight' => '500px',
                    'dataExtra' => '',
                ];

                $settings = array_merge($default, $settings);

                return view('admin.template.buttons.editBig', ['link' => $link, 'settings' => $settings])->render();
            }

        static function otherButton(string $link, array $settings = []): string
            {
                $default = [
                    'icon' => 'typcn typcn-th-menu',
                    'title' => __('app.info'),
                    'class' => 'btn btn-az-primary btn-icon p-0 m-0',
                    'classExtra' => '',
                    'dataFunctionName' => '',
                    'dataMaxWidth' => '',
                    'dataMaxHeight' => '',
                    'dataExtra' => '',
                ];

                $settings = array_merge($default, $settings);

                return view('admin.template.buttons.other', ['link' => $link, 'settings' => $settings])->render();
            }
        static function deleteButton($link, $id, $settings = [])
            {
                $default = [
                    'icon' => 'typcn typcn-trash',
                    'title' => __('app.delete'),
                    'class' => 'btn btn-danger btn-icon p-0 m-0 delete',
                    'dataFunctionName' => 'delete',
                    'dataExtra' => '',
                ];
                $settings = array_merge($default, $settings);

                return view('admin.template.buttons.delete', ['link'=>$link, 'id'=> $id, 'settings'=>$settings])->render();
            }

        function backButton($url = '')
            {
                if (!$url) $url = url()->previous();
                return '<div class="mg-b-20 text-right">' .
                    '<a href="' . $url . '" class="btn btn-sm btn-primary btn-icon" data-title="' . __('admin.back') . '"><i class="la la-arrow-left"></i></a>' .
                    '</div>';
            }

        static function formSubmitButton(array $settings = []): string
            {
                $default = [
                    'class' => '',
                    'title' => __('app.save'),
                    'btnColor' => 'btn-az-primary',
                ];

                $settings = array_merge($default, $settings);

                return view('admin.template.buttons.formSubmit', ['settings'=>$settings])->render();
            }

        function getFilterButton()
            {
                $title = __('admin.filter');

                $html = '<a href="javascript:;" class="btn btn-sm btn-primary font-weight-bold" data-function-name="filter" title="' . $title . '" id="kt_filter_menu_toggle">';
                $html .= '<i class="las la-filter"></i> ' . $title;
                $html .= '</a>';

                return $html;
            }
    }
