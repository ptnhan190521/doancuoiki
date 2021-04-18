@if(Session::has('note_sc'))
					<script>
						alert('Đăng ký thành công');
						window.location="{{url('login')}}"
					</script>
@endif