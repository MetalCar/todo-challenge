import _ from 'lodash';
import './bootstrap';

$(function () {

    const refreshToDoList = () => {
        $('#js-todo-list').load($('#js-todo-list').data('url'), function (response) {
            $('.js-todo-edit-open').on('click', function () {
                const toDoId = $(this).data('id');

                const originalHeight = $(this).closest('.list-group-item').height();
                $(this).closest('.list-group-item').animate({
                    height: '260px',
                }, 1000);

                let listGroupItem = $(this).closest('.list-group-item');
                $('#js-todo-edit-form-' + toDoId).fadeIn(1000, function () {
                    $(this).find('form').on('submit', function (e) {
                        e.preventDefault();

                        const formData = new FormData($(this)[0]);
                        axios.post($(this).attr('action'), formData).then((response) => {
                            if (response.data.success) {
                                $('#js-todo-edit-form-' + toDoId).fadeOut(1000);
                                listGroupItem.animate({
                                    height: originalHeight + 'px',
                                }, 1000, function () {
                                    refreshToDoList();
                                });
                            }
                        })
                    });
                });
            })

            $('.js-todo-undone').on('click', function () {
                axios.post($(this).data('url')).then((response) => {
                    if (response.data.success) {
                        refreshToDoList();
                    }
                })
            });

            $('.js-todo-done').on('click', function () {
                axios.post($(this).data('url')).then((response) => {
                    if (response.data.success) {
                        refreshToDoList();
                    }
                })
            });
        })
    }

    $('#js-todo-create-form').on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData($(this)[0]);

        $(this).find('input').val('');

        axios.post($(this).attr('action'), formData).then((response) => {
            if (response.data.success) {
                refreshToDoList();
            }
        })
    });


    // on init after page load
    refreshToDoList();
});