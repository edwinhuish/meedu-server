@extends('layouts.backend')

@section('body')

    @include('components.breadcrumb', ['name' => '添加VIP'])

    <el-row>
        <el-col :span="24" style="margin-bottom: 20px;">
            <meedu-a :url="'{{ route('backend.role.index') }}'" :name="'返回VIP列表'"></meedu-a>
        </el-col>
    </el-row>

    <el-row :gutter="20">
        <el-form label-position="top" method="post">
            <input type="hidden" name="_method" value="PUT">
            {!! csrf_field() !!}
            <el-col :span="12" :offset="6">
                <el-form-item label="VIP名">
                    <el-input name="name" placeholder="VIP名" v-model="role.name"></el-input>
                </el-form-item>

                <el-form-item label="价格">
                    <el-input name="charge" placeholder="价格" v-model="role.charge"></el-input>
                </el-form-item>

                <el-form-item label="有效期（单位：天）">
                    <el-input name="expire_days" placeholder="有效期（单位：天）"  v-model="role.expire_days"></el-input>
                </el-form-item>

                <el-form-item label="权重（权重越大，权限越大）">
                    <el-input name="weight" placeholder="权重（权重越大，权限越大）" v-model="role.weight"></el-input>
                </el-form-item>

                <el-form-item label="权限内容(一行一条)">
                    <el-input
                            type="textarea"
                            :rows="4"
                            name="description"
                            placeholder="权限内容(一行一条)"
                            v-model="role.description">
                    </el-input>
                </el-form-item>

                <el-form-item>
                    <el-button native-type="submit" type="primary" native-button="submit">保存</el-button>
                </el-form-item>
            </el-col>
        </el-form>
    </el-row>

@endsection

@section('js')
    <script>
        var Page = new Vue({
            el: '#app',
            data: function () {
                return {
                    role: @json($role)
                }
            }
        });
        (new Page).$mount('#app-body');
    </script>
@endsection