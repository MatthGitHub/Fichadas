package kronosiii.negocio.entidades;

import javax.annotation.Generated;
import javax.persistence.metamodel.ListAttribute;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;
import kronosiii.negocio.entidades.Empleados;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2016-12-23T14:27:01")
@StaticMetamodel(Tipodefranco.class)
public class Tipodefranco_ { 

    public static volatile SingularAttribute<Tipodefranco, String> descripcion;
    public static volatile SingularAttribute<Tipodefranco, String> resolucion;
    public static volatile ListAttribute<Tipodefranco, Empleados> empleadosList;
    public static volatile SingularAttribute<Tipodefranco, String> hora;
    public static volatile SingularAttribute<Tipodefranco, Integer> idTipoFranco;
    public static volatile SingularAttribute<Tipodefranco, String> dia;

}