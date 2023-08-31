// Definición de la contract class para gestionar datos de contactos.
public class ContactContract {
    // Definición de la autoridad del Content Provider.
    public static final String CONTENT_AUTHORITY = "com.example.myapp";
    
    // Creación de la URI base para el Content Provider.
    public static final Uri BASE_CONTENT_URI = Uri.parse("content://" + CONTENT_AUTHORITY);
    
    // Definición de la ruta para los datos de contactos.
    public static final String PATH_CONTACTS = "contacts";
    
    // Creación de la URI completa para los datos de contactos.
    public static final Uri CONTENT_URI = BASE_CONTENT_URI.buildUpon().appendPath(PATH_CONTACTS).build();
}


// Implementación de la clase ContentProvider para gestionar datos.
public class MyContentProvider extends ContentProvider {
    // ... otros métodos ...

    @Override
    public Cursor query(Uri uri, String[] projection, String selection, String[] selectionArgs, String sortOrder) {
        // Implementa la lógica para consultar datos según la URI proporcionada.
    }

    @Override
    public Uri insert(Uri uri, ContentValues values) {
        // Implementa la lógica para insertar nuevos datos y devuelve la URI del nuevo elemento.
    }

    // ... otros métodos ...
}


// Registro del Content Provider en el archivo de manifiesto.
<provider
    // Especificación de la clase ContentProvider que se usará.
    android:name=".MyContentProvider"
    
    // Definición de la autoridad del Content Provider.
    android:authorities="com.example.myapp"
    
    // Restricción de la exportación del Content Provider.
    android:exported="false" />
