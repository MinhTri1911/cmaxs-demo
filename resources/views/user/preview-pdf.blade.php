@extends('layouts.white')

@section('title',__('users-general.head_list_user'))

@section('style')
    <link rel="stylesheet" href="{{asset("/css/user-general.css")}}">
@endsection

@section('menu_header')
    @include('elements.service_menu')
@endsection

@section('body-class', 'list-common-user')

@section('content')
    <div class="main-content" id="user-general">
        <h1 class="main-heading">Text goes here</h1>
        <div class="main-summary user-list">
            <div class="list-process">
                <ul>
                    <li><a href="{{route('user.print-pdf')}}" target="_blank" class="btn btn-blue-light btn-w150"><i class="fa fa-print"></i> Print</a></li>
                    <li><a href="{{route('user.stream-pdf')}}" target="_blank" class="btn btn-blue-light"><i class="fa fa-chrome" aria-hidden="true"></i> Show on browser</a></li>
                    <li><a href="{{route('user.stream-pdf-2')}}" target="_blank" class="btn btn-blue-light"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Template 2</a></li>
                    <li><a href="{{route('user.stream-pdf-3')}}" target="_blank" class="btn btn-blue-light"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Template 3</a></li>
                </ul>
                <style>
                    .list-process ul{list-style:none;padding:0;margin:0;}
                    .list-process ul li{display: inline-block;margin-right:5px;}
                </style>
            </div>
            <h1 style="font-weight:bold;">THIS BILL FOR LIST USER</h1>
            <table>
                <tr class="thead" align="center" style="color:#ff0000">
                    <td align="center">#ID</td>
                    <td align="center">船舶</td>
                    <td align="center" lang="ja">船舶マスタ</td>
                    <td align="center">各システムの</td>
                    <td align="center">関する基本情報</td>
                    <td align="center">イベントマスター</td>
                    <td align="center">CMAXS対象所 Cộng hòa xã hội chủ nghĩa việt nam</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
                <tr>
                    <td>12344</td>
                    <td>システムにて行った見積情報</td>
                    <td>ーム・要望詳細</td>
                    <td>キャンペーン価格設定及びスケジュール</td>
                    <td>各船に特殊課金情おける特見積殊おけるステムにてた見積情報おける特る特要望詳殊報</td>
                    <td>各船における特殊課金情おける積情報おける特る特要望詳殊報</td>
                    <td>特見積殊おける要望詳殊報</td>
                </tr>
            </table>
            <style>
                body{
                    font-family: "DejaVu Sans";
                    margin: 0;
                }
                h1{
                    font-weight: 900;
                    color: #45a163;
                    margin-top: 10px;
                    margin-bottom: 30px;
                    text-align: center;
                }
                table{
                    border-collapse: collapse;
                }

                table thead{
                    background: #ddd;
                }
                table td, table th{
                    border: 1px solid #333;
                }
                table tr.thead{
                    background: #ddd;
                    text-align: center;
                    font-weight: 700;
                }
            </style>
        </div>
    </div>
</div>
@endsection