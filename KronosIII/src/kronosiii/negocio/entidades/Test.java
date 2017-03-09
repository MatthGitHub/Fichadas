/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.negocio.entidades;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Administrador
 */
@Entity
@Table(name = "TEST")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Test.findAll", query = "SELECT t FROM Test t"),
    @NamedQuery(name = "Test.findByLegajo", query = "SELECT t FROM Test t WHERE t.legajo = :legajo"),
    @NamedQuery(name = "Test.findByFecha", query = "SELECT t FROM Test t WHERE t.fecha = :fecha"),
    @NamedQuery(name = "Test.findByEntradaSalida", query = "SELECT t FROM Test t WHERE t.entradaSalida = :entradaSalida"),
    @NamedQuery(name = "Test.findByReloj", query = "SELECT t FROM Test t WHERE t.reloj = :reloj"),
    @NamedQuery(name = "Test.findByHora", query = "SELECT t FROM Test t WHERE t.hora = :hora")})
public class Test implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "Legajo")
    private Integer legajo;
    @Basic(optional = false)
    @Column(name = "fecha")
    private String fecha;
    @Column(name = "EntradaSalida")
    private Integer entradaSalida;
    @Basic(optional = false)
    @Column(name = "reloj")
    private String reloj;
    @Basic(optional = false)
    @Column(name = "Hora")
    @Temporal(TemporalType.TIMESTAMP)
    private Date hora;

    public Test() {
    }

    public Test(Integer legajo) {
        this.legajo = legajo;
    }

    public Test(Integer legajo, String fecha, String reloj, Date hora) {
        this.legajo = legajo;
        this.fecha = fecha;
        this.reloj = reloj;
        this.hora = hora;
    }

    public Integer getLegajo() {
        return legajo;
    }

    public void setLegajo(Integer legajo) {
        this.legajo = legajo;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public Integer getEntradaSalida() {
        return entradaSalida;
    }

    public void setEntradaSalida(Integer entradaSalida) {
        this.entradaSalida = entradaSalida;
    }

    public String getReloj() {
        return reloj;
    }

    public void setReloj(String reloj) {
        this.reloj = reloj;
    }

    public Date getHora() {
        return hora;
    }

    public void setHora(Date hora) {
        this.hora = hora;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (legajo != null ? legajo.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Test)) {
            return false;
        }
        Test other = (Test) object;
        if ((this.legajo == null && other.legajo != null) || (this.legajo != null && !this.legajo.equals(other.legajo))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Test[ legajo=" + legajo + " ]";
    }
    
}
