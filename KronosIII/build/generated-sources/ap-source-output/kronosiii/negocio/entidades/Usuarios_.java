package kronosiii.negocio.entidades;

import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;
import kronosiii.negocio.entidades.Tipousuario;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2016-12-23T14:27:01")
@StaticMetamodel(Usuarios.class)
public class Usuarios_ { 

    public static volatile SingularAttribute<Usuarios, Date> fechaAlta;
    public static volatile SingularAttribute<Usuarios, Integer> idUsuario;
    public static volatile SingularAttribute<Usuarios, String> apellido;
    public static volatile SingularAttribute<Usuarios, Tipousuario> iDTipoUsuario;
    public static volatile SingularAttribute<Usuarios, Boolean> predeterminada;
    public static volatile SingularAttribute<Usuarios, String> usuario;
    public static volatile SingularAttribute<Usuarios, String> nombre;
    public static volatile SingularAttribute<Usuarios, String> contraseña;

}