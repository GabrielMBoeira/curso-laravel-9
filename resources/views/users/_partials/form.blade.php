@csrf
<input type="text" name="name" placeholder="Digite seu nome..." value="{{ $user->name ?? old('name')}}">
<input type="email" name="email" placeholder="Digite seu e-mail..." value="{{ $user->email ?? old('email')}}">
<input type="password" name="password" placeholder="Digite sua senha">
<button type="submit">Enviar</button>
