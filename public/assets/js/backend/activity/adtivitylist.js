define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'activity/adtivitylist/index' + location.search,
                    add_url: 'activity/adtivitylist/add',
                    edit_url: 'activity/adtivitylist/edit',
                    del_url: 'activity/adtivitylist/del',
                    multi_url: 'activity/adtivitylist/multi',
                    table: 'activity',
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
                        {field: 'title', title: __('Title')},
                        {field: 'deadline', title: __('Deadline'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'intime', title: __('Intime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'imgurl', title: __('Imgurl'), formatter: Table.api.formatter.image},
                        {field: 'isopen', title: __('Isopen')},
                        {field: 'ispass', title: "是否到期"},
                        {field: 'isshow', title: "是否展示"},
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