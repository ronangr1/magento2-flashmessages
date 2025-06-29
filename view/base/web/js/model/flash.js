/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
define(['ko', 'underscore'], function (ko, _) {
    'use strict';

    return {
        messages: ko.observableArray([]),

        get: function () {
            return this.messages()
        },

        set: function (messages) {
            const self = this
            _.each(messages, function (message) {
                message.visible = ko.observable(true);
                self.messages.push(message)
            })
            return this
        },

        delete: function (message) {
            message.visible(false);
            setTimeout(function () {
                this.messages.remove(message);
            }.bind(this), 500)

            return this
        }
    }
})
