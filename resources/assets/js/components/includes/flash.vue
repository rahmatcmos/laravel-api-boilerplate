<template>
	<a v-if="notificationType == 'UserCreatedNotification'" :data-notification-id="notification.id" href="javascript:;" @click="selectNotification()">
		<v-gravatar :email="notification.data.user.email" default-img="mm" :size="48" class="user-image" alt="User Image" />
		<div>
			<div>
				<span v-html="$t('notifications.types.UserCreatedNotification.message',
							  {user_name : notification.data.user.name})"></span>
				<small>
					<i class="fa fa-clock-o"></i> {{ momentFromNow(notification.created_at) }}
				</small>
			</div>
		</div>
	</a>
	<a v-else href="#">
		Unknown notification type <span v-html="notification.type"></span> !
	</a>
</template>
<script>
	export default {
		name: 'Flash',
		props: ['notification'],

        mounted() {
            this.notify();
        },
		
        computed: {
            notificationType() {
                return this.notification.type.replace('App\\Notifications\\', '');
            }
        },
		
		methods: {
		    /**
			 * Notify
			 */
		    notify() {
                // pushed property if just received
                if (this.notification.pushed) {
                    var notificationHtml = $('[data-notification-id="' + this.notification.id + '"]').html();
                    var n = new Noty({
                        theme: 'semanticui',
                        type: 'alert',
                        layout: 'bottomRight',
                        text: notificationHtml,
                        timeout: 5000,
                        progressBar: true,
                        closeWith: ['click', 'button'],
                        animation: {
                            open: 'noty_effects_open',
                            close: 'noty_effects_close'
                        },
                        callbacks: {
                            onShow: () => {
                                $(n.barDom).bind('click', () => { this.selectNotification(); });
                            }
                        }
                    });
                    n.show();

                    document.getElementById('noty_audio').play();
                }
			},
			
			/**
			 * Mark notification as read and/or redirect
			 */
			selectNotification() {
				// Redirect to the resource route
				switch (this.notification.type) {
					case 'App\\Notifications\\UserCreatedNotification' :
						this.$router.push({
							name: 'user',
							params: {
								'userId': this.notification.data.user_id
							}
						});
						break;
				}

				if (this.notification.read_at)
					return;

				apiAxios.post('/me/notification/' + this.notification.id + '/read')
					.then(response => {
						this.notification.read_at = response.data.data.read_at;
					}).catch(error => {
						this.$root.axiosError(error);
					});
			}
		}
	}
</script>