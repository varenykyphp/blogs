<!-- Silence is golden -->
Update the projects User Model file with the following:

- add to the name space:  
    use Varenyky\Traits\UserExtendable;

    class User extends Authenticatable
    {
        use HasApiTokens, HasFactory, Notifiable, UserExtendable;

-  add 'role' to the $fillable array.