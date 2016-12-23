package kronosiii.negocio.entidades;

import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;
import kronosiii.negocio.entidades.Usuarios;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2016-12-23T14:27:00")
@StaticMetamodel(Tipousuario.class)
public class Tipousuario_ { 

    public static volatile SingularAttribute<Tipousuario, String> descripcion;
    public static volatile ListAttribute<Tipousuario, Usuarios> usuariosList;
    public static volatile SingularAttribute<Tipousuario, Integer> nivelUsuario;
    public static volatile SingularAttribute<Tipousuario, Integer> iDTipoUsuario;

}