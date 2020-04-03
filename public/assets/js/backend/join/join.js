define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'join/join/index' + location.search,
                    add_url: 'join/join/add',
                    edit_url: 'join/join/edit',
                    del_url: 'join/join/del',
                    multi_url: 'join/join/multi',
                    table: 'join',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'stu_name', title: __('Stu_name')},
                        {field: 'age', title: __('Age')},
                        {field: 'sex', title: __('Sex'),searchList: {"1":__('男'),"2":__('女')}, formatter: Table.api.formatter.status},
                        {field: 'birthday', title: __('Birthday')},
                        {field: 'school', title: __('School')},
                        {field: 'grade', title: __('Grade')},
                        {field: 'hobby', title: __('Hobby')},
                        {field: 'prize', title: __('Prize')},
                        {field: 'par_name', title: __('Par_name')},
                        {field: 'mobile', title: __('Mobile')},
                        {field: 'area', title: __('Area')},
                        {field: 'type', title: __('参赛人数')},
                        {field: 'groupType', title: __('Grouptype')},
                        {field: 'worktitle', title: __('Worktitle')},
                        {field: 'video', title: __('Video'), formatter: Table.api.formatter.url},
                        {field: 'img', title: __('Img'), formatter: Table.api.formatter.image},
                        {field: 'phone', title: __('Phone')},
                        {field: 'activity_title', title: __('Activity_title')},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});