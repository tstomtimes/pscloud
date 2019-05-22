@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')
<style media="screen">
  .column{
    padding-top: 0;
    padding-bottom: 0;
  }
  .columns{
    margin-top: 0;
    margin-bottom: 0;
  }
</style>
<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/members">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">作成・更新</a></li>
      </ul>
    </nav>
    <h1 class="title is-1">従業員の作成・更新</h1>
    @if(isset($member))
        {{ Form::model($member, ['route' => ['members.update', $member->id], 'method' => 'patch']) }}
    @else
        {{ Form::open(['route' => 'members.store']) }}
    @endif
    {{ Form::label('employee_no','従業員番号',['class' => 'label form-top-space']) }}
    {{ Form::text('employee_no', old('employee_no'), ['class' => 'input']) }}
    <div class="columns">
      <div class="column">
        {{ Form::label('last_name','姓',['class' => 'label form-top-space']) }}
        {{ Form::text('last_name', old('last_name'), ['class' => 'input']) }}
      </div>
      <div class="column">
        {{ Form::label('first_name','名',['class' => 'label form-top-space']) }}
        {{ Form::text('first_name', old('first_name'), ['class' => 'input']) }}
      </div>
    </div>
    <div class="columns">
      <div class="column">
        {{ Form::label('last_name_kana','姓（カナ）',['class' => 'label form-top-space']) }}
        {{ Form::text('last_name_kana', old('last_name_kana'), ['class' => 'input']) }}
      </div>
      <div class="column">
        {{ Form::label('first_name_kana','名（カナ）',['class' => 'label form-top-space']) }}
        {{ Form::text('first_name_kana', old('first_name_kana'), ['class' => 'input']) }}
      </div>
    </div>
    {{ Form::label('place_id','所属',['class' => 'label form-top-space']) }}
    {{ Form::select('place_id', ['' => '選択してください'] + array_pluck($places, 'name', 'id'), old('place_id'), ['class' => 'input']) }}
    {{ Form::label('sex','性別',['class' => 'label form-top-space']) }}
    {{ Form::select('sex', ['' => '選択してください', '男性' => '男性', '女性' => '女性'], old('sex'), ['class' => 'input']) }}
    {{ Form::label('birthday','生年月日',['class' => 'label form-top-space']) }}
    {{ Form::date('birthday', old('birthday'), ['class' => 'input']) }}
    {{ Form::label('hire_date','入社日',['class' => 'label form-top-space']) }}
    {{ Form::date('hire_date', old('hire_date'), ['class' => 'input']) }}
    <hr>
    <div class="columns">
      <div class="column">
        {{ Form::label('retirement_date','退社日',['class' => 'label form-top-space']) }}
        {{ Form::date('retirement_date', old('retirement_date'), ['class' => 'input']) }}
        {{ Form::label('retirement_type','退社事由',['class' => 'label form-top-space']) }}
        {{ Form::select('retirement_type', ['' => '選択してください', '解雇' => '解雇', '退職' => '退職', '死亡' => '死亡'], old('retirement_type'), ['class' => 'input']) }}
      </div>
      <div class="column">
        {{ Form::label('retirement_note','退社事由',['class' => 'label form-top-space']) }}
        {{ Form::textarea('retirement_note', old('retirement_note'), ['class' => 'textarea']) }}
      </div>
    </div>
    <hr>
    {{ Form::label('postalcode','郵便番号',['class' => 'label form-top-space']) }}
    {{ Form::text('postalcode', old('postalcode'), ['class' => 'input']) }}
    {{ Form::label('address1','住所１',['class' => 'label form-top-space']) }}
    {{ Form::text('address1', old('address1'), ['class' => 'input']) }}
    {{ Form::label('address2','住所２',['class' => 'label form-top-space']) }}
    {{ Form::text('address2', old('address2'), ['class' => 'input']) }}
    {{ Form::label('tel','電話番号',['class' => 'label form-top-space']) }}
    {{ Form::text('tel', old('address2'), ['class' => 'input']) }}
    {{ Form::label('email','Eメール',['class' => 'label form-top-space']) }}
    {{ Form::text('email', old('address2'), ['class' => 'input']) }}
    {{ Form::label('occupation','仕事内容',['class' => 'label form-top-space']) }}
    {{ Form::text('occupation', old('address2'), ['class' => 'input']) }}
    {{ Form::label('salary_classification','給与形態',['class' => 'label form-top-space']) }}
    {{ Form::select('salary_classification', ['' => '選択してください', '時給' => '時給', '日給' => '日給', '月給' => '月給'], old('salary_classification'), ['class' => 'input']) }}
    {{ Form::label('work_days','勤務日数',['class' => 'label form-top-space']) }}
    {{ Form::text('work_days', old('work_days'), ['class' => 'input']) }}
    <div class="level">
      <div class="level-item has-text-centered">
        <div>
          {{ Form::label('is_monday','月',['class' => 'label form-top-space']) }}
          {{ Form::hidden('is_monday', '0') }}
          {{ Form::checkbox('is_monday', '1', Input::old('is_monday', $member->is_monday)) }}
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          {{ Form::label('is_tuesday','火',['class' => 'label form-top-space']) }}
          {{ Form::hidden('is_tuesday', '0') }}
          {{ Form::checkbox('is_tuesday', '1', Input::old('is_tuesday', $member->is_tuesday)) }}
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          {{ Form::label('is_wednesday','水',['class' => 'label form-top-space']) }}
          {{ Form::hidden('is_wednesday', '0') }}
          {{ Form::checkbox('is_wednesday', '1', Input::old('is_wednesday', $member->is_wednesday)) }}
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          {{ Form::label('is_thursday','木',['class' => 'label form-top-space']) }}
          {{ Form::hidden('is_thursday', '0') }}
          {{ Form::checkbox('is_thursday', '1', Input::old('is_thursday', $member->is_thursday)) }}
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          {{ Form::label('is_friday','金',['class' => 'label form-top-space']) }}
          {{ Form::hidden('is_friday', '0') }}
          {{ Form::checkbox('is_friday', '1', Input::old('is_friday', $member->is_friday)) }}
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          {{ Form::label('is_saturday','土',['class' => 'label form-top-space']) }}
          {{ Form::hidden('is_saturday', '0') }}
          {{ Form::checkbox('is_saturday', '1', Input::old('is_saturday', $member->is_saturday)) }}
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          {{ Form::label('is_sunday','日',['class' => 'label form-top-space']) }}
          {{ Form::hidden('is_sunday', '0') }}
          {{ Form::checkbox('is_sunday', '1', Input::old('is_sunday', $member->is_sunday)) }}
        </div>
      </div>
    </div>
    {{ Form::label('yearly_limit','年間限度収入',['class' => 'label form-top-space']) }}
    {{ Form::text('yearly_limit', old('yearly_limit'), ['class' => 'input']) }}
    {{ Form::label('dayly_transportation_cost','交通費',['class' => 'label form-top-space']) }}
    {{ Form::text('dayly_transportation_cost', old('dayly_transportation_cost'), ['class' => 'input']) }}
    {{ Form::label('employment_status_id','雇用形態',['class' => 'label form-top-space']) }}
    {{ Form::select('employment_status_id', ['' => '選択してください'] + array_pluck($employment_statuses, 'name', 'id'), old('employment_status_id'), ['class' => 'input']) }}
    {{ Form::label('bank_name','銀行名',['class' => 'label form-top-space']) }}
    {{ Form::text('bank_name', old('bank_name'), ['class' => 'input']) }}
    {{ Form::label('bank_code','金融機関コード',['class' => 'label form-top-space']) }}
    {{ Form::text('bank_code', old('bank_code'), ['class' => 'input']) }}
    {{ Form::label('branch_name','支店名',['class' => 'label form-top-space']) }}
    {{ Form::text('branch_name', old('branch_name'), ['class' => 'input']) }}
    {{ Form::label('branch_code','支店コード',['class' => 'label form-top-space']) }}
    {{ Form::text('branch_code', old('branch_code'), ['class' => 'input']) }}
    {{ Form::label('account_type','口座種類',['class' => 'label form-top-space']) }}
    {{ Form::select('account_type', ['' => '選択してください', '普通' => '普通', '当座' => '当座'], old('account_type'), ['class' => 'input']) }}
    {{ Form::label('account_number','口座番号',['class' => 'label form-top-space']) }}
    {{ Form::text('account_number', old('account_number'), ['class' => 'input']) }}
    <hr>
    {{ Form::label('is_social_insurance','社会保険',['class' => 'label form-top-space']) }}
    {{ Form::hidden('is_social_insurance', '0') }}
    {{ Form::checkbox('is_social_insurance', '1', Input::old('is_social_insurance', $member->is_social_insurance)) }}
    {{ Form::date('social_insurance_start', old('social_insurance_start'), ['class' => 'input']) }}
    {{ Form::label('social_insurance_id','社会保険番号',['class' => 'label form-top-space']) }}
    {{ Form::text('social_insurance_id', old('social_insurance_id'), ['class' => 'input']) }}
    <hr>
    {{ Form::label('is_basic_pension','基礎年金',['class' => 'label form-top-space']) }}
    {{ Form::hidden('is_basic_pension', '0') }}
    {{ Form::checkbox('is_basic_pension', '1', Input::old('is_basic_pension', $member->is_basic_pension)) }}
    {{ Form::date('basic_pension_start', old('basic_pension_start'), ['class' => 'input']) }}
    {{ Form::label('basic_pension_id','基礎年金番号',['class' => 'label form-top-space']) }}
    {{ Form::text('basic_pension_id', old('basic_pension_id'), ['class' => 'input']) }}
    <hr>
    {{ Form::label('is_welfare_pension','厚生年金',['class' => 'label form-top-space']) }}
    {{ Form::hidden('is_welfare_pension', '0') }}
    {{ Form::checkbox('is_welfare_pension', '1', Input::old('is_welfare_pension', $member->is_welfare_pension)) }}
    {{ Form::date('welfare_pension_start', old('welfare_pension_start'), ['class' => 'input']) }}
    {{ Form::label('welfare_pension_id','厚生年金番号',['class' => 'label form-top-space']) }}
    {{ Form::text('welfare_pension_id', old('welfare_pension_id'), ['class' => 'input']) }}
@endsection
